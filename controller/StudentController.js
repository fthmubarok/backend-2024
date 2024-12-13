// Mengelola data students menggunakan array
let students = [];

class StudentController {
  // Menampilkan semua students
  index(req, res) {
    const data = {
      message: "Menampilkan semua students",
      data: students,
    };
    res.json(data);
  }

  // Menambahkan student baru
  store(req, res) {
    const { nama } = req.body;

    if (!nama) {
      return res.status(400).json({ message: "Nama student wajib diisi" });
    }

    const newStudent = {
      id: students.length + 1,
      nama,
    };

    students.push(newStudent);

    const data = {
      message: `Menambahkan data student: ${nama}`,
      data: newStudent,
    };
    res.json(data);
  }

  // Mengedit data student berdasarkan id
  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;

    const studentIndex = students.findIndex((student) => student.id === parseInt(id));

    if (studentIndex === -1) {
      return res.status(404).json({ message: `Student dengan id ${id} tidak ditemukan` });
    }

    if (!nama) {
      return res.status(400).json({ message: "Nama student wajib diisi" });
    }

    students[studentIndex].nama = nama;

    const data = {
      message: `Mengedit student id ${id}, nama ${nama}`,
      data: students[studentIndex],
    };
    res.json(data);
  }

  // Menghapus student berdasarkan id
  destroy(req, res) {
    const { id } = req.params;

    const studentIndex = students.findIndex((student) => student.id === parseInt(id));

    if (studentIndex === -1) {
      return res.status(404).json({ message: `Student dengan id ${id} tidak ditemukan` });
    }

    const deletedStudent = students.splice(studentIndex, 1);

    const data = {
      message: `Menghapus student id ${id}`,
      data: deletedStudent[0],
    };
    res.json(data);
  }
}

// Membuat object StudentController
const studentController = new StudentController();

// Export object StudentController
module.exports = studentController;
