<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        resep_obat_{{ $prescriptions->medical_record[0]->patient->nama }}_{{ $prescriptions->medical_record[0]->patient->id_pasien }}
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        td {
            padding: .4rem;
        }
    </style>

</head>

<body>

    <div class="container">
        <section class="data">
            <h1 class="text-center my-4">Resep Obat</h1>

            <div class="info mb-4">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $prescriptions->medical_record[0]->patient->nama }}</td>
                    </tr>
                    <tr>
                        <td>No BPJS</td>
                        <td>:</td>
                        <td>{{ $prescriptions->medical_record[0]->patient->no_bpjs ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ ucwords($prescriptions->medical_record[0]->patient->jenis_kelamin) }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Periksa</td>
                        <td>:</td>
                        <td>{{ ucwords($prescriptions->medical_record[0]->created_at->format('m D Y')) }}</td>
                    </tr>
                </table>
            </div>

            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nama Obat</th>
                    <th>Aturan Pakai</th>
                </thead>
                <tbody>
                    <td>1.</td>
                    <td>{{ $prescriptions->medicine->nama_obat }}</td>
                    <td>{!! $prescriptions->aturan_pakai !!}</td>
                </tbody>
            </table>
        </section>

        <div class="row justify-content-end mt-5">
            <div class="col-4">
                <div class="role">
                    <p class="role">
                        <strong>{{ ucwords(auth()->user()->role) }}</strong>
                    </p>
                    <p class="name mt-5">
                        {{ ucwords(auth()->user()->username) }}
                    </p>
                </div>
            </div>
        </div>

    </div>


    <script>
        window.print()
    </script>
</body>

</html>
