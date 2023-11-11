<div class="col-12 mt-5">
    <div class="card mt-3 p-5">
        <div class="col-12 mt-3 mb-3">
            <h5>หัวข้อ</h5>
            <input type="text" id="board_title" class="form-control">
            <h5>รายละเอียด</h5>
            <textarea name="board_detail" id="board_detail" cols="30" rows="10" class="form-control"></textarea>
            <input type="file" name="input_image" id="input_image" class="form-control" onchange="_handlechange()">
            <input type="text" name="board_image" id="board_image" class="d-none">
            <h4>ตัวอย่างภาพ</h4>
            <img src="" alt="" srcset="" class="w-100 d-none" id="imgPreview">
            <button class="btn btn-lg btn-primary" onclick="_handleSubmit()">
                Post
            </button>
        </div>
        <table class="table table-stripted">

            <tr>
                <th>#</th>
                <th>ภาพ</th>
                <th>หัวข้อ</th>
                <th>รายละเอียด</th>
                <th>ผู้เข้าชม</th>
                <th>Action</th>
            </tr>

            <?php for ($i = 0; $i < count($boards_list); $i++) {
                $item = $boards_list[$i] ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><img src="<?php echo $item['board_image'] ?>" alt="" srcset="" style="width: 10rem;"></td>
                    <td><?php echo $item['board_title'] ?></td>
                    <td><?php echo $item['board_detail'] ?></td>
                    <td><?php echo $item['board_view'] ?></td>
                    <td>
                        <button class="btn btn-primary" onclick="to('?app=static_board&view=Board&idx=<?php echo $i ?>')">รายละเอียด</button>
                        <button class="btn btn-warning" onclick="to('?app=manage_board&view=Update&idx=<?php echo $i ?>')">แก้ไข</button>
                        <button class="btn btn-danger" onclick="_deleteBoard(<?php echo $item['id'] ?>)">ลบ</button>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>
</div>
<script>
    function _handleSubmit() {
        const board_title = document.querySelector('#board_title').value
        const board_detail = document.querySelector('#board_detail').value
        const board_image = document.querySelector('#board_image').value

        fetch('Controllers/insertBoardBy.php', {
                headers: {
                    "Accept": 'application/json',
                    "Content-Type": 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    board_title,
                    board_detail,
                    board_image
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data) {
                    window.location.reload()
                } else {
                    getEle('#errorPage').classList.remove('d-none')
                }
            })
    }

    function _deleteBoard(board_id) {
        fetch('Controllers/deleteBoardByID.php', {
                headers: {
                    "Accept": 'application/json',
                    "Content-Type": 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    board_id
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data) {
                    window.location.reload()
                } else {
                    getEle('#errorPage').classList.remove('d-none')
                }
            })

    }

    function _handlechange() {
        const file = document.querySelector('#input_image').files[0]
        const reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onload = () => {
            document.querySelector('#imgPreview').setAttribute('src', reader.result)
            document.querySelector('#imgPreview').classList.remove('d-none')
            document.querySelector('#board_image').value = reader.result
        }
    }
</script>