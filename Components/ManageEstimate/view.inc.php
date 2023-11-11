<div class="col-12 mt-5">
    <h1>จัดการการประเมิน</h1>
    <hr>
    <div class="col-12 card p-5">

        <table class="table table-stripted" id="es_list">
            <?php for ($i = 0; $i < count($estimates_list); $i++) {
                $item = $estimates_list[$i] ?>
                <tr id="e_<?php echo $i ?>">
                    <td><input type="text" id="e_item" class="form-control" value="<?php echo $item['estimate_title'] ?>"></td>
                    <td>
                        <button class="btn btn-danger w-100" onclick="document.querySelector('#e_<?php echo $i ?>').remove()">ลบ</button>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <div class="col-12">
            <button class="btn btn-primary w-100 mb-2" onclick="addRow()">เพิ่ม</button>
            <button class="btn btn-success w-100" onclick="_handleSubmit()">บัททึก</button>
        </div>
    </div>
</div>

<script>
    function addRow() {
        const newTr = document.createElement('tr')
        const countEs = document.querySelectorAll('#e_item').length
        newTr.setAttribute('id', 'e_'+countEs)
        newTr.innerHTML = `
                <td><input type="text" id="e_item" class="form-control" value=""></td>
                <td>
                    <button class="btn btn-danger bg-danger w-100" onclick="document.querySelector('#e_${countEs}').remove()">ลบ</button>
                </td>
        `
        document.querySelector('#es_list').append(newTr)
    }

    function _handleSubmit() {
        const inputs = document.querySelectorAll('#e_item')
        const data = []
        inputs.forEach(item=>{
            data.push({
                estimate_title: item.value
            })
        })

        fetch('Controllers/updateEstimate.php', {
                headers: {
                    "Accept": 'application/json',
                    "Content-Type": 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    data
                })
            })
            .then(res => res.json())
            .then(_r => {
                // console.log(_r);
                if (_r) {
                    window.location.reload()
                } else {
                    getEle('#errorPage').classList.remove('d-none')
                }
            })
    }
</script>