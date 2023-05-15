import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { Eye, XCircle } from "react-feather";

function Live() {
    const [complaints, setComplaints] = useState([]);

    async function fetchComplaints() {
        try {
            const response = await fetch(
                "http://127.0.0.1:8000/api/complaints"
            ).then((response) => response.json());

            setComplaints(response);
        } catch (e) {
            console.log(e.message);
        }
    }

    useEffect(() => {
        fetchComplaints();

        Pusher.logToConsole = true;

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
                            {complaint.response_id != null ? (
                                complaint.response.status == "ditolak" ? (
                                    <>
                                        <td>{complaint.nama}</td>
                                        <td>{complaint.judul}</td>
                                        <td>{complaint.created_at}</td>
                                        <td>{complaint.response.status}</td>
                                        <td>
                                            <a
                                                href={`/admin/detail/${complaint.id}`}
                                                className="badge bg-info"
                                            >
                                                <Eye size={20} />
                                            </a>
                                            <a
                                                href={`/admin/${complaint.id}/delete`}
                                                className="badge bg-danger"
                                                onClick={() => {
                                                    confirm(
                                                        "Yakin ingin menghapus aduan ini"
                                                    );
                                                }}
                                            >
                                                <XCircle size={20} />
                                            </a>
                                        </td>
                                    </>
                                ) : (
                                    <>
                                        <td>{complaint.nama}</td>
                                        <td>{complaint.judul}</td>
                                        <td>{complaint.created_at}</td>
                                        <td>{complaint.response.status}</td>
                                        <td>
                                            <a
                                                href={`/admin/detail/${complaint.id}`}
                                                className="badge bg-info"
                                            >
                                                <Eye size={20} />
                                            </a>
                                            <a
                                                href={`/admin/${complaint.id}/delete`}
                                                className="badge bg-danger"
                                                onClick={() => {
                                                    confirm(
                                                        "Yakin ingin menghapus aduan ini"
                                                    );
                                                }}
                                            >
                                                <XCircle size={20} />
                                            </a>
                                        </td>
                                    </>
                                )
                            ) : (
                                <>
                                    <td>{complaint.nama}</td>
                                    <td>{complaint.judul}</td>
                                    <td>{complaint.created_at}</td>
                                    <td>pending</td>
                                    <td>
                                        <a
                                            href={`/admin/detail/${complaint.id}`}
                                            className="badge bg-info"
                                        >
                                            <Eye size={20} />
                                        </a>
                                        <a
                                            href={`/admin/${complaint.id}/delete`}
                                            className="badge bg-danger"
                                            onClick={() => {
                                                confirm(
                                                    "Yakin ingin menghapus aduan ini"
                                                );
                                            }}
                                        >
                                            <XCircle size={20} />
                                        </a>
                                    </td>
                                </>
                            )}
                        </tr>
                    );
                })}
        </>
    );
}

export default Live;

if (document.getElementById("live")) {
    ReactDOM.render(<Live />, document.getElementById("live"));
}
