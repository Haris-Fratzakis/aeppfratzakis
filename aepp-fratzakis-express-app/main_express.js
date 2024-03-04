const express = require('express');
const app = express();
const multer = require('multer');
const port = 3000;

// Multer configuration for file upload
const storage = multer.diskStorage({
  destination: function(req, file, cb) {
    cb(null, 'uploads/'); // Ensure this directory exists
  },
  filename: function(req, file, cb) {
    cb(null, file.fieldname + '-' + Date.now() + '.' + file.originalname.split('.').pop());
  }
});
const upload = multer({ storage: storage });

app.post('/upload', upload.single('image'), (req, res) => {
  const { title, summary } = req.body;
  const file = req.file;
  // Process the uploaded data here (e.g., save to your database)

  res.json({ message: 'Successfully uploaded', file: file.path });
});

app.listen(port, () => console.log(`App listening at http://localhost:${port}`));
