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
    axios
      .get("http://localhost:80/flower-manager-crud/api/flowers")
      .then((response) => {
        console.log(response.data);

        let flowerData = response.data;
        setFlowers(flowerData);
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
              <th>Color</th>
              <th>Created at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {flowers.length > 0 &&
              flowers.map((flower, key) => (
                <tr key={key}>
                  <td>{flower.id}</td>
                  <td>{flower.name}</td>
                  <td>{flower.Description}</td>
                  <td>{flower.Color}</td>
                  <td>{flower.created_at}</td>
                  <td>
                    <div style={{ display: "flex", gap: "10px" }}>
                      <Link href={`flowers/${flower.id}`}>More</Link>
                      <Link href={`flowers/${flower.id}/edit`}>Edit</Link>
                      <Link href={`flowers/${flower.id}/delete`}>Delete</Link>
                    </div>
                  </td>
                </tr>
              ))}
            <tr></tr>
          </tbody>
        </table>
      </div>
    </main>
  );
}
