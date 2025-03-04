<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan SIMRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-100 to-green-100">
    <div id="formContainer" class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-lg">
        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">FORM PENGAJUAN SIMRS</h2>
        <form action="{{ route('pengajuan.store') }}" method="POST">
            @csrf
            
            <!-- Input Fields -->
            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">JUDUL PENGAJUAN</label>
                <input type="text" id="judul" name="judul" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>

            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">JENIS PENGAJUAN</label>
                <input type="text" id="jenis" name="jenis" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>

            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">DASAR PEMBUATAN PENGAJUAN</label>
                <input type="text" id="dasar" name="dasar" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>

            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">URGENSI & MANFAAT PENGAJUAN</label>
                <input type="text" id="urgensi" name="urgensi" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>

            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">PERUBAHAN ATAU PENAMBAHAN YANG DIAJUKAN</label>
                <input type="text" id="perubahan" name="perubahan" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>

            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">NAMA INSTALASI / RUANGAN</label>
                <input type="text" id="instalasi" name="instalasi" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>

            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">NAMA PEMOHON / PIC</label>
                <input type="text" id="pemohon" name="pemohon" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>

            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">KONTAK PEMOHON / PIC (NO WHATSAPP)</label>
                <input type="text" id="kepala_instalasi" name="kepala_instalasi" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>

            <div class="space-y-3">
                <label class="block text-gray-700 font-semibold">KONTAK PEMOHON / PIC (NO WHATSAPP)</label>
                <input type="text" id="kontak" name="kontak" class="w-full border-2 border-gray-300 p-3 rounded-lg">
            </div>



            <div class="flex space-x-4 mt-4">
                <button type="submit" class="w-1/2 p-3 text-white bg-green-500 rounded-lg hover:bg-green-600">Submit →</button>
                <button type="button" id="printButton" class="w-1/2 p-3 text-white bg-blue-500 rounded-lg hover:bg-blue-600" onclick="showPrintPreview(event)">Cetak →</button>
            </div>
        </form>
    </div>

    <script>
        async function showPrintPreview(event) {
            event.preventDefault();
            let formElement = document.getElementById("formContainer");
            
            html2canvas(formElement, {
                scale: 2,
                useCORS: true
            }).then((canvas) => {
                let imgData = canvas.toDataURL("image/png");
                let pdf = new jspdf.jsPDF("p", "mm", "a4");

                let imgWidth = 190;
                let imgHeight = (canvas.height * imgWidth) / canvas.width;

                let pageHeight = 297;
                let yPosition = 10;

                while (imgHeight > 0) {
                    pdf.addImage(imgData, "PNG", 10, yPosition, imgWidth, Math.min(imgHeight, pageHeight - 20));
                    imgHeight -= pageHeight - 20;
                    yPosition = -280;
                    if (imgHeight > 0) pdf.addPage();
                }

                let pdfBlob = pdf.output("blob");
                let pdfUrl = URL.createObjectURL(pdfBlob);
                window.open(pdfUrl);
            });
        }
    </script>
</body>
</html>
