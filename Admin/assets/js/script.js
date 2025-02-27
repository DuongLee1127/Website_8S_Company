document.querySelectorAll('.dropdown-js').forEach(toggle => {
    toggle.addEventListener('click', function (event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định
        const parent = this.parentElement; // Lấy phần tử cha (li.dropdown)
        
        // Đóng tất cả dropdown khác
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            if (dropdown !== parent) {
                dropdown.classList.remove('active');
            }
        });

        // Mở hoặc đóng dropdown hiện tại
        parent.classList.toggle('active');
    });
});
// Đóng dropdown khi nhấp bên ngoài
document.addEventListener('click', function (event) {
    if (!event.target.closest('.dropdown')) {
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
});

document.querySelectorAll('.addBtn').forEach(toggle =>{
    toggle.addEventListener('click', function(event){
        event.preventDefault();
        const parent = this.parentElement;
        parent.classList.toggle('active');
    });
});

function confirmDelete(id, getct) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
        window.location.href = "index.php?task=ht&ct="+getct +"&idxbv=" + id;
    }
}
function confirmDeletecbbv() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xndbv');
        inputElement.name = "xndbv";
    }
}
function confirmDeletecbsp() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xnd');
        inputElement.name = "xnd";
    }
}
function confirmDeletevv(id, getct) {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn mục này không?")) {
        window.location.href = "index.php?task=ht&ct="+getct +"&idxvvbv=" + id;
    }
}
function confirmDeletesp(id) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
        window.location.href = "index.php?task=qlsp&idsp=" + id;
    }
}
function confirmDeletephkh(id) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
        window.location.href = "index.php?task=qlphanhoi&idph=" + id;
    }
}
function confirmDeletevvsp(id) {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn mục này không?")) {
        window.location.href = "index.php?task=qlsp&idxvvsp=" + id;
    }
}
function confirmDeletecttv(id) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
        window.location.href = "index.php?task=qlctytv&idcttv=" + id;
    }
}
function confirmDeletevvcttv(id) {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn mục này không?")) {
        window.location.href = "index.php?task=qlctytv&idxvvcttv=" + id;
    }
}
function confirmDeletekh(id, getct) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
        window.location.href = "index.php?task=qlkh&kh="+getct+ "&idlh=" + id;
    }
}
function confirmDeletecbkh() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xndkh');
        inputElement.name = "xndkh";
    }
}
function confirmDeletecbphkh() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xndphkh');
        inputElement.name = "xndphkh";
    }
}
function confirmDeletecbvvcttv() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xvvndcttv');
        inputElement.name = "xvvndcttv";
    }
}
function confirmDeletecbvvphkh() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xvvndphkh');
        inputElement.name = "xvvndphkh";
    }
}
function confirmDeletecbvvcttva() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xvvndcttva');
        inputElement.name = "xvvndcttva";
    }
}
function confirmDeletecbvvphkha() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xvvndphkha');
        inputElement.name = "xvvndphkha";
    }
}
function confirmDeletevvkh(id, getct) {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn mục này không?")) {
        window.location.href = "index.php?task=qlkh&kh="+getct+"&idxvvkh=" + id;
    }
}
function confirmDeletelienhe(id) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
        window.location.href = "index.php?task=qllh&idlienhe=" + id;
    }
}
function confirmDeletecblh() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xndlh');
        inputElement.name = "xndlh";
    }
}
function confirmDeletevvlienhe(id) {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn mục này không?")) {
        window.location.href = "index.php?task=qllh&idttkh=" + id;
    }
}
function confirmDeleteuse(id) {
    if (confirm("Bạn có chắc chắn muốn xóa Use này không?")) {
        window.location.href = "index.php?task=qlu&idxoau=" + id;
    }
}
function confirmDeletecbu() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xndu');
        inputElement.name = "xndu";
    }
}
function confirmDeletecbcttv() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xndcttv');
        inputElement.name = "xndcttv";
    }
}

function confirmDeletecbh2() {
    if (confirm("Bạn có chắc chắn muốn xóa các mục này không?")) {
        const inputElement = document.getElementById('xndh2');
        inputElement.name = "xndh2";
    }
}
function confirmDeletecbvvh2() {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn các mục này không?")) {
        const inputElement = document.getElementById('xvvndh2');
        inputElement.name = "xvvndh2";
    }
}
function confirmDeletecbvvh2a() {
    if (confirm("Bạn có chắc chắn muốn xóa tất cả thùng rác không?")) {
        const inputElement = document.getElementById('xvvndh2a');
        inputElement.name = "xvvndh2a";
    }
}
function confirmDeletecbbvvv() {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn các mục này không?")) {
        const inputElement = document.getElementById('xvvndbv');
        inputElement.name = "xvvndbv";
    }
}
function confirmDeletecbbvvva() {
    if (confirm("Bạn có chắc chắn muốn xóa tất cả thùng rác không?")) {
        const inputElement = document.getElementById('xvvndbva');
        inputElement.name = "xvvndbva";
    }
}
function confirmDeletecbspvv() {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn các mục này không?")) {
        const inputElement = document.getElementById('xvvnd');
        inputElement.name = "xvvnd";
    }
}
function confirmDeletecbspvva() {
    if (confirm("Bạn có chắc chắn muốn xóa tất cả thùng rác không?")) {
        const inputElement = document.getElementById('xvvnda');
        inputElement.name = "xvvnda";
    }
}
function confirmDeletehome2(id) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
        window.location.href = "index.php?task=qlhome2&idh2=" + id;
    }
}

function confirmDeletecbkhvv() {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn các mục này không?")) {
        const inputElement = document.getElementById('xvvndkh');
        inputElement.name = "xvvndkh";
    }
}

function confirmDeletecbkhvva() {
    if (confirm("Bạn có chắc chắn muốn xóa tất cả thùng rác không?")) {
        const inputElement = document.getElementById('xvvndkha');
        inputElement.name = "xvvndkha";
    }
}
function confirmDeletecblhvv() {
    if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn các mục này không?")) {
        const inputElement = document.getElementById('xvvndlh');
        inputElement.name = "xvvndlh";
    }
}
function confirmDeletecblhvva() {
    if (confirm("Bạn có chắc chắn muốn xóa tất cả thùng rác không?")) {
        const inputElement = document.getElementById('xvvndlha');
        inputElement.name = "xvvndlha";
    }
}

function confirmDeletevvhome2(id) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
        window.location.href = "index.php?task=qlhome2&deletehome2=" + id;
    }
}


