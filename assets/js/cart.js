function plus() {
    num = parseInt($("#quantity").val()); // lấy giá trị nhập vào từ ô input số lượng
    tem = num+1; // cộng lên 1
    $("#quantity").val(tem); // gán lại giá trị
    //console.log(tem);
}
function minus () {
    num = parseInt($("#quantity").val());
    if (num > 1) {
        tem = num - 1; // trừ 1
    }
    $("#quantity").val(tem);
    //console.log(tem);
}
function addCart(id) {
    num = parseInt($("#quantity").val()); // lấy giá trị nhập vào từ ô input số lượng
    $.post("addcart.php", {'id':id, 'number':num}, function(result){ // post lên session ajax
        $('#myModal').modal('show');
        //location.reload();
    });
}
function updateCart(id) {
    num = parseInt($("#quantity_"+id).val()); // lấy số lượng + id sản phẩm để update số lượng
    updateDeleteCart(id,num);
}
function deleteCart(id) {
    updateDeleteCart(id,0);
}
function updateDeleteCart (id,num) {
    // nếu update sẽ chạy hàm này hoặc ngược lại sử dụng hàm deletecart ở trên, gán id + giá trị cho nó = 0 để xoá
    $.post("updatecart.php", {'id':id, 'number':num}, function(result){
        location.reload()
    });
}