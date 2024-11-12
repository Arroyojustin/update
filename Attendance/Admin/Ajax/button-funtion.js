   document.getElementById("exportCSVBtn").addEventListener("click", function () {
        // Define the header for the CSV template
        const csvHeaders = "id,lastname,firstname,middle_initial,student_no,weight,height,bmi,bloodtype,phone_no,email,password,user_type,phone,gender,civil_status\n";
        
        // Create a Blob object with CSV data
        const csvBlob = new Blob([csvHeaders], { type: 'text/csv' });
        
        // Create a link element to download the CSV file
        const link = document.createElement("a");
        link.href = URL.createObjectURL(csvBlob);
        link.download = "student_template.csv";
        
        // Simulate a click on the link to trigger the download
        link.click();
    });
