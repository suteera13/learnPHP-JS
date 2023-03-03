<?php session_start() ?>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        font-size: 12px;
        text-align: center;
        width: 600px;
        margin-top: 15px;
    }
</style>
<p><?php echo "คุณ ".$_SESSION['username']." รหัส ".$_SESSION['password']  ?></p>
<table>
    <thead>
        <th>ชื่อ</th>
        <th>จำนวน</th>
        <th>ราคา</th>
    </thead>
    <tbody>
        <?php @$$total = 0; ?>
        <?php foreach ($_SESSION['cart'] as $data) { ?>
            <tr>
                <td><?php echo $data[0] ?></td>
                <td><?php echo $data[2] ?></td>
                <td><?php echo $data[1] ?></td>
            </tr>
        <?php @$total += $data[2]*$data[1]; } ?>
        <tr><td colspan="3"><?php echo @number_format($total)." บาท" ?></td></tr>
    </tbody>
</table>
