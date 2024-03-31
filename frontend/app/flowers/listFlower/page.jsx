"use client";

import axios from "axios";
import Link from "next/link";
import { useEffect, useState } from "react";

export default function listFlower() {
  const [flowers, setFlowers] = useState([]);

  useEffect(() => {
    getFlowers();
  }, []);

  const getFlowers = () => {
    axios.get("http://localhost:80/api/flowers").then((response) => {
      console.log(response.data);
      setFlowers(response.data);
    });
  };

  return (
    <main>
      <h1>List Flower</h1>
      <div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Maintenance</th>
              <th>Location</th>
              <th>Color</th>
              <th>Winter Care Tips</th>
              <th>How to use</th>
              <th>Propagation</th>
              <th>Worth knowing</th>
              <th>Created at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {flowers.map((flower, key) => {
              <tr key={key}>
                <td>{flower.id}</td>
                <td>{flower.name}</td>
                <td>{flower.description}</td>
                <td>{flower.maintenance}</td>
                <td>{flower.location}</td>
                <td>{flower.color}</td>
                <td>{flower.winter_care_tips}</td>
                <td>{flower.how_to_use}</td>
                <td>{flower.propagation}</td>
                <td>{flower.worth_knowing}</td>
                <td>{flower.created_at}</td>
                <td>
                  <Link to={`flowers/${flower.id}/edit`}>Edit</Link>
                  <Link to={`flowers/${flower.id}/delete`}>Delete</Link>
                </td>
              </tr>;
            })}
            <tr></tr>
          </tbody>
        </table>
      </div>
    </main>
  );
}
