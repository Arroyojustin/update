   const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');

    dropZone.addEventListener('click', () => fileInput.click());
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = 'darkgreen';
    });
    dropZone.addEventListener('dragleave', () => {
        dropZone.style.borderColor = 'green';
    });
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = 'green';
        fileInput.files = e.dataTransfer.files;  // Access files for upload handling
        // Further file handling can be added here
    });

