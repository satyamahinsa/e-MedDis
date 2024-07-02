from flask import Flask, request, render_template, redirect, url_for, flash, session
from datetime import datetime
import requests, json

app = Flask(__name__)
app.secret_key = 'emeddis'

API_RESEP_URL = 'http://localhost:8000/api/reseps'
API_OBAT_RESEP_URL = 'http://localhost:8000/api/obat_reseps'
API_OBAT_URL = 'http://localhost:8000/api/obats'

@app.route('/', methods=['POST', 'GET'])
def registration():
    if request.method == 'POST':
        nomorAntrian = request.form['nomorAntrian']
        tanggalLahir_str = request.form['tanggalLahir']
        tanggalLahir = datetime.strptime(tanggalLahir_str, '%Y-%m-%d').date()
        
        try:
            response = requests.get(API_RESEP_URL, params={'no_antrian': nomorAntrian, 'tanggal_lahir_pasien': tanggalLahir})
            if response.status_code == 200:
                data_resep = response.json()['data']
                session['data_resep'] = data_resep
                return redirect(url_for('confirmation'))
            else:
                flash('Data resep tidak ditemukan! Mohon periksa kembali nomor antrian dan tanggal lahir Anda.')
                return redirect(url_for('registration'))
        except requests.exceptions.RequestException as e:
            flash(f'Error dalam mengakses API: {str(e)}')
            return redirect(url_for('registration'))
    
    else:
        return render_template('pages/registration.html')

@app.route('/confirmation')
def confirmation():
    data_resep = session.get('data_resep')
    if not data_resep:
        flash('Data resep tidak ditemukan di sesi. Mohon ulangi proses registrasi.')
        return redirect(url_for('registration'))
    
    try:
        id_resep = data_resep[0]['id']
        
        response_obat_resep = requests.get(API_OBAT_RESEP_URL, params={'resep_id': id_resep})
        if response_obat_resep.status_code == 200:
            data_obat_resep = response_obat_resep.json()['data']
            data_obat = []

            i = 0
            for obat_resep in data_obat_resep:
                id_obat = obat_resep['obat_id']
                response_obat = requests.get(API_OBAT_URL, params={'id': id_obat})
                if response_obat.status_code == 200:
                    data_obat.append(response_obat.json()['data'][0])
                    data_obat[i]['jumlah'] = obat_resep['jumlah']
                    i += 1
                else:
                    flash(f'Error dalam mengakses API Obat untuk obat_id {id_obat}')
                    return redirect(url_for('registration'))
                
            return render_template('pages/confirmation.html', data_resep=data_resep[0], data_obat=data_obat)
        else:
            flash(f'Error dalam mengakses API Obat Resep untuk resep_id {id_resep}')
            return redirect(url_for('registration'))
    
    except requests.exceptions.RequestException as e:
        flash(f'Error dalam mengakses API: {str(e)}')
        return redirect(url_for('registration'))

if __name__ == '__main__':
    app.run(port=5000, debug=True)
