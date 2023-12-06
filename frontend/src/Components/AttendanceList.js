import React, { useEffect, useState } from 'react';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';
const apiUrl = "http://localhost:8000/api/show-attendance";

const AttendanceList = () => {
    const [attendances, setAttendances] = useState([]);

    useEffect(() => {
        axios.get(apiUrl)
            .then(response => {
                setAttendances(response.data.data);
            })
            .catch(error => {
                console.error(error);
            });
    }, []);

    return (
        <div className="container mt-5">
            <h1 className="mb-4">Attendance Data</h1>
            <table className="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Working Hours</th>
                    </tr>
                </thead>
                <tbody>
                    {attendances.map(attendance => (
                        <tr key={attendance.id}>
                            <td>{attendance.user.name}</td>
                            <td>{attendance.check_in || 'N/A'}</td>
                            <td>{attendance.check_out || 'N/A'}</td>
                            <td>{attendance.total_hours || 'N/A'}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default AttendanceList;
