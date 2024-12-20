// import Model Student
const Student = require("../models/Student");

class StudentController {
  // menambahkan keyword async
  async index(req, res) {
    // memanggil method static all dengan async await.
    const students = await Student.all();

    const data = {
      message: "Menampilkan semua students",
      data: students,
    };

    res.json(data);
  }

  async store(req, res) {
    /**
     * Memanggil method create.
     * Method create mengembalikan data yang baru diinsert.
     * Mengembalikan response dalam bentuk json.
     */
    try {
      // Mengambil data dari body request 
      const studentData = {
        nama: req.body.nama,
        nim: req.body.nim,
        email: req.body.email,
        jurusan: req.body.jurusan,
      };

      // Memanggil method create dari model Student
      const newStudent = await Student.create(studentData);

      const data = {
        message: "Menambahkan data student",
        data: newStudent,
      };

      res.status(201).json(data); // Mengembalikan status 201 Created
    } catch (error) {
      // Menangani error
      res.status(500).json({
        message: "Terjadi kesalahan saat menambahkan data student",
        error: error.message,
      });
    }
  }

  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;

    const data = {
      message: `Mengedit student id ${id}, nama ${nama}`,
      data: [],
    };

    res.json(data);
  }

  destroy(req, res) {
    const { id } = req.params;

    const data = {
      message: `Menghapus student id ${id}`,
      data: [],
    };

    res.json(data);
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;