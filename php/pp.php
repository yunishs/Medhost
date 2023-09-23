<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passport Photo Upload</title>
    <style>
        /* Style the form container */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        /* Style the file input container */
        .file-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        /* Style the file input */
        input[type="file"] {
            display: none;
        }

        label {
            cursor: pointer;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        label:hover {
            background-color: #0056b3;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Passport Photo Upload</h2>
        <div class="file-container">
            <label for="photo">Click to Upload Passport Photo</label>
            <input type="file" id="photo" accept="image/*" onchange="previewPhoto()">
            <img id="photo-preview" src="#" alt="Preview" style="display: none;">
        </div>
    </div>

    <script>
        // Function to display the selected image as a preview
        function previewPhoto() {
            const fileInput = document.getElementById('photo');
            const imagePreview = document.getElementById('photo-preview');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.style.display = 'block';
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</body>
</html> 

