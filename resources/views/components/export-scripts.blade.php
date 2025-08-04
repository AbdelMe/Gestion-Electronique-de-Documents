@push('script')
    {{-- Excel Export --}}
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

    {{-- PDF Export --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

    <script>
        const exportDate = new Date().toISOString().split('T')[0]; // YYYY-MM-DD
        const baseFileName = 'users_log_' + exportDate;

        // Excel
        function exportTableToExcel(tableId, filename = baseFileName + '.xlsx') {
            const table = document.getElementById(tableId);
            if (!table) return alert("Table not found!");
            const wb = XLSX.utils.table_to_book(table, { sheet: "Users Logs" });
            XLSX.writeFile(wb, filename);
        }

        // PDF
        function exportTableToPDF(tableId, filename = baseFileName + '.pdf') {
            const table = document.getElementById(tableId);
            if (!table) return alert("Table not found!");

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('l', 'pt', 'a4'); // Landscape mode

            const headers = [];
            table.querySelectorAll('thead tr th').forEach(th => {
                headers.push(th.innerText.trim());
            });

            const data = [];
            table.querySelectorAll('tbody tr').forEach(tr => {
                const rowData = [];
                tr.querySelectorAll('td').forEach(td => {
                    rowData.push(td.innerText.trim());
                });
                data.push(rowData);
            });

            doc.autoTable({
                head: [headers],
                body: data,
                startY: 20,
                styles: { fontSize: 10 },
                headStyles: { fillColor: [22, 160, 133] },
                theme: 'striped',
                margin: { left: 10, right: 10 }
            });

            doc.save(filename);
        }

        // Word
        function exportTableToWord(tableId, filename = baseFileName + '.doc') {
            const table = document.getElementById(tableId);
            if (!table) return alert("Table not found!");

            const html = `
                <html xmlns:o='urn:schemas-microsoft-com:office:office'
                      xmlns:w='urn:schemas-microsoft-com:office:word'
                      xmlns='http://www.w3.org/TR/REC-html40'>
                <head><meta charset='utf-8'><title>Export HTML to Word</title></head>
                <body>${table.outerHTML}</body></html>`;

            const blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });

            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = filename;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Auto-export if triggered via ?export=1&format=...
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            const isExport = urlParams.get('export') === '1';
            const format = urlParams.get('format');

            if (isExport && format) {
                if (format === 'excel') {
                    exportTableToExcel('getData');
                } else if (format === 'pdf') {
                    exportTableToPDF('getData');
                } else if (format === 'word') {
                    exportTableToWord('getData');
                }

                // Optional: return to normal paginated view after 2 seconds
                setTimeout(() => {
                    window.location.href = window.location.pathname;
                }, 2000);
            }
        };
    </script>
@endpush
