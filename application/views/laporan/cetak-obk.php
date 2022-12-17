<!-- Begin Page Content -->
<div class="container-fluid">

    <style>
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 10px 10px 10px;
        }

        .hitam {
            color: black;
        }
    </style>

    <div class="text-center mt-4 hitam">
        <h1 class="h3 font-weight-bold"><?= $p['instansi']; ?></h1>
        <h4 class="font-weight-bold"><u><?= $title; ?></u></h4>
        <p><?= $p['alamat']; ?></p>
    </div>
    <p class="border-top"></p>

    <div>
        <table class="table-data hitam">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>NAMA</th>
                    <th>KATEGORI</th>
                    <th>JENIS</th>
                    <th>SATUAN</th>
                    <th>JUMLAH</th>
                    <th>HARGA JUAL</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($obatkeluar as $ok) : ?>
                    <tr>
                        <td scope="row"><?= $no++; ?></td>
                        <td><?= $ok['obat']; ?></td>
                        <td><?= $ok['kategori_obat']; ?></td>
                        <td><?= $ok['jenis_obat']; ?></td>
                        <td><?= $ok['satuan_obat']; ?></td>
                        <td><?= $ok['jumlah']; ?></td>
                        <td>Rp.<?= $ok['harga_jual']; ?></td>
                        <td>Rp.<?= $ok['subtotal']; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr class="font-weight-bold">
                    <td class="text-center" colspan="7">TOTAL</td>
                    <td>Rp.<?php
                            $where = ['subtotal != 0'];
                            $totalstok = $this->Modeluser->totalok('subtotal', $where);
                            echo $totalstok;
                            ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="hitam float-right">
        <p class="mb-4 py-5">Surakarta, <?= date('d F Y', time()); ?>
            <br>Pimpinan <?= $p['instansi']; ?>
        </p>
        <p>___________________________</p>
    </div>

</div>
<!-- End of Main Content -->

</div>
<!-- End of Page Wrapper -->

<script type="text/javascript">
    window.print();
</script>

</body>

</html>