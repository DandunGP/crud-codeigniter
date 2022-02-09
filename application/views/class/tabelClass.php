<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <a href="<?= base_url('classroom/insert/') ?>"><button class="btn-success mt-3 rounded">Tambah Data Kelas</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Kelas</th>
                <th scope="col">Nama Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($class as $cls) { ?>
                <tr>
                    <td><?= $cls['id_class'] ?></td>
                    <td><?= $cls['name_class'] ?></td>
                    <td>
                        <a href="<?= base_url('classroom/editClass/') . $cls['id_class'] ?>">Edit</a> <a href="<?= base_url('classroom/deleteClass/') . $cls['id_class'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>