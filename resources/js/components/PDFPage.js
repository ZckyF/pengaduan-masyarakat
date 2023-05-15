import React from "react";
import ReactDOM from "react-dom";
import jsPDF from "jspdf";

function PDFPage() {
    function generatePDF() {
        const page = new jsPDF("p", "pt", "a4");
        page.html(document.getElementById("content"), {
            callback: function (pdf) {
                pdf.save("response.pdf");
            },
        });
    }

    return (
        <button className="bg-red-400" onClick={generatePDF}>
            Create
        </button>
    );
}

export default PDFPage;

if (document.getElementById("action")) {
    ReactDOM.render(<PDFPage />, document.getElementById("action"));
}
