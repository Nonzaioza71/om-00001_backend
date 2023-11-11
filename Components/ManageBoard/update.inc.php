<?php 
    $board_data = $boards_list[$_GET['idx']];
?>
<div class="col-12 mt-5">
    <div class="col-12 mt-3 mb-3 card p-5">
        <h5>หัวข้อ</h5>
        <input type="text" id="board_title" class="form-control" value="<?php echo $board_data['board_title']?>">
        <h5>รายละเอียด</h5>
        <textarea name="board_detail" id="board_detail" cols="30" rows="10" class="form-control"> <?php echo $board_data['board_detail']?></textarea>
        <input type="file" name="input_image" id="input_image" class="form-control" onchange="_handlechange()">
        <input type="text" name="board_image" id="board_image" class="d-none" value="<?php echo $board_data['board_image']?>">
        <input type="text" name="board_id" id="board_id" class="d-none" value="<?php echo $board_data['id']?>">
        <h4>ตัวอย่างภาพ</h4>
        <img src="<?php echo $board_data['board_image']?>" alt="" srcset="" class="w-100" id="imgPreview">
        <button class="btn btn-lg btn-primary" onclick="_handleSubmit()">
            Update
        </button>
    </div>
</div>

<script>
    function _handleSubmit() {
        const board_title = document.querySelector('#board_title').value
        const board_detail = document.querySelector('#board_detail').value
        const board_image = document.querySelector('#board_image').value
        const id = document.querySelector('#board_id').value

        fetch('Controllers/updateBoardByID.php', {
                headers: {
                    "Accept": 'application/json',
                    "Content-Type": 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    id,
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