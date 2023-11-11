<div class="col-12 mt-5">
    <h1>สถิติบอร์ดการประเมิน</h1>
    <hr>
    <div class="col-12 card p-5">
        <div class="mb-3 col-12">
            <h3><strong>คะแนนประเมินโดยรวมทั้งหมดจาก <?php echo count($users_estimated) ?> ผู้ใช้งาน</strong></h3>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>หัวข้อ</th>
                    <th>คะแนน</th>
                </tr>

                <?php for ($i = 0; $i < count($estimates_avg_list); $i++) {
                    $item = $estimates_avg_list[$i] ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $item['estimate_title'] ?></td>
                        <td><?php echo $item['raw_score'] ?></td>
                    </tr>
                <?php } ?>

            </table>
        </div>
        <div class="mb-3 col-12">
            <h3><strong>คะแนนประเมินโดยเฉลี่ยทั้งหมดจาก <?php echo count($users_estimated) ?> ผู้ใช้งาน</strong></h3>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>หัวข้อ</th>
                    <th>คะแนน</th>
                </tr>

                <?php for ($i = 0; $i < count($estimates_avg_list); $i++) {
                    $item = $estimates_avg_list[$i] ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $item['estimate_title'] ?></td>
                        <td><?php echo number_format($item['raw_score'] / count($users_estimated), 2) ?></td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</div>