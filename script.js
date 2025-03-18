document.getElementById("search").addEventListener("input", function () {
    let keyword = this.value;
    fetch("config.php?search=" + keyword)
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("table-body");
            tableBody.innerHTML = "";
            data.forEach(m => {
                tableBody.innerHTML += `
                    <tr>
                        <td>${m.nama}</td>
                        <td>${m.nim}</td>
                        <td>${m.jurusan}</td>
                        <td>
                            <button class="edit-btn" data-id="${m.id}" data-nama="${m.nama}" data-nim="${m.nim}" data-jurusan="${m.jurusan}">✏ Ubah</button>
                            <a href="index.php?delete=${m.id}" onclick="return confirm('Hapus?')">🗑 Hapus</a>
                        </td>
                    </tr>
                `;
            });
            addEditEvent();
        });
});

// MODAL FUNCTIONALITY
const modal = document.getElementById("modal");
const openModalBtn = document.getElementById("open-modal");
const closeModalBtn = document.querySelector(".close");

openModalBtn.onclick = () => {
    document.getElementById("modal-title").innerText = "Tambah Mahasiswa";
    document.getElementById("id").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("nim").value = "";
    document.getElementById("jurusan").value = "";
    document.getElementById("submit-btn").innerText = "Tambah";
    modal.style.display = "block";
};

closeModalBtn.onclick = () => modal.style.display = "none";
window.onclick = (e) => { if (e.target === modal) modal.style.display = "none"; };

// TAMBAHKAN EVENT LISTENER KE TOMBOL EDIT
function addEditEvent() {
    document.querySelectorAll(".edit-btn").forEach(btn => {
        btn.onclick = function () {
            document.getElementById("modal-title").innerText = "Ubah Mahasiswa";
            document.getElementById("id").value = this.getAttribute("data-id");
            document.getElementById("nama").value = this.getAttribute("data-nama");
            document.getElementById("nim").value = this.getAttribute("data-nim");
            document.getElementById("jurusan").value = this.getAttribute("data-jurusan");
            document.getElementById("submit-btn").innerText = "Simpan";
            modal.style.display = "block";
        };
    });
}

// JALANKAN FUNCTION SETELAH HALAMAN DIMUAT
addEditEvent();
