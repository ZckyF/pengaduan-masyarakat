import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { RefreshCcw } from "react-feather";

function ComplaintsRemoved() {
    const [complaints, setComplaints] = useState([]);

    async function fetchComplaints() {
        try {
            const response = await fetch(
                "http://127.0.0.1:8000/api/complaints/removed"
            ).then((response) => response.json());

            setComplaints(response);
        } catch (e) {
            console.log(e.message);
        }
    }

    useEffect(() => {
        fetchComplaints();

        // Pusher.logToConsole = true;

        var pusher = new Pusher("72fed3cca886fbc8f626", {
            cluster: "ap1",
        });

        var channel = pusher.subscribe("yamet-kudasi");

        channel.bind("yamet-channel", function (evt) {
            fetchComplaints();
        });
    }, []);

    return (
        <>
            {complaints &&
                complaints.map(function (complaint) {
                    return (
                        <tr key={complaint.id}>
                            <td>{complaint.nama}</td>
                            <td>{complaint.judul}</td>
                            <td>{complaint.created_at}</td>
                            <td>
                                <a
                                    href={`/admin/histori/restore/${complaint.id}`}
                                    className="badge bg-warning"
                                >
                                    <RefreshCcw size={20} />
                                </a>
                            </td>
                        </tr>
                    );
                })}
        </>
    );
}

export default ComplaintsRemoved;

if (document.getElementById("complaintsRemovedLive")) {
    ReactDOM.render(
        <ComplaintsRemoved />,
        document.getElementById("complaintsRemovedLive")
    );
}
