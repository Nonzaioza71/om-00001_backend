<div class="col-12 pt-5">
    <div class="col-12 d-flex justify-content-center">
        <div class="col-10">
            <div class="row">
                <h1>ตั้งค่าแบบประเมิน</h1>
            </div>
            <hr>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center pb-5">
        <div class="container">
            <div class="col-12 row justify-content-center">
                <div class="col-8">
                    <table class="table">
                        <tr>
                            <th>
                                <h4 class="text-center">หัวข้อประเมิน</h4>
                            </th>
                            <th>
                                <h4 class="text-center">Action</h4>
                            </th>
                        </tr>
                    </table>
                    <table class="table" id="estimate_list">
                        <?php for ($i = 0; $i < count($estimate_list); $i++) { ?>
                            <tr>
                                <td>
                                    <input class="form-control form-control-lg" type="text" id="estimate_list_item" value="<?php echo $estimate_list[$i]['estimate_title']?>">
                                </td>
                                <td>
                                    <button class="btn btn-lg btn-danger w-100" onClick="removeRow(this)">ลบ</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table class="table">
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-info w-100" onclick="addRow()">เพิ่ม</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-success w-100" onclick="_handleSubmit()">บันทึก</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addRow() {
        const list = document.querySelector('#estimate_list')
        const newEle = document.createElement('tr')
        newEle.innerHTML = `
            <td>
                <input class="form-control form-control-lg bg-success-50" type="text" id="estimate_list_item" placeholder="NEW ITEM">
            </td>
            <td>
                <button class="btn btn-lg btn-danger w-100 bg-danger" onClick="removeRow(this)">ลบ</button>
            </td>
        `
        list.append(newEle)
        newEle.focus()
    }

    function removeRow(ele) {
        // const list = document.querySelector('#estimate_list')
        ele.closest('td').closest('tr').remove()
    }

    function _handleSubmit() {
        const eles = document.querySelectorAll('#estimate_list_item')
        let data = []
        eles.forEach(item => {
            data.push({
                estimate_title: item.value
            })
        })
        fetch('./Controllers/updateEstimate.php', {
                header: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                method: "POST",
                body: JSON.stringify({
                    data
                })
            })
            .then(res => res.json())
            .then(data => {
                const _r = {
                    isSuccess: true,
                    refresh: true
                }
                toggleDoctorRequestModal(_r)
            })
            .catch(e => {
                const _r = {
                    isSuccess: false,
                    refresh: true
                }
                toggleDoctorRequestModal(_r)
            })
    }
</script>

<?php require_once(__DIR__ . '/modal.inc.php'); ?>