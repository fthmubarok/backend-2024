const express = require('express');
const app = express();
const studentController = require('../controller/StudentController');

app.use(express.json());

app.get('/students', studentController.index);
app.post('/students', studentController.store);
app.put('/students/:id', studentController.update);
app.delete('/students/:id', studentController.destroy);

app.listen(3000, () => console.log('Server running on http://localhost:3000'));
