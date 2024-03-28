"use client";
import { useState } from "react";

export default function createFlower() {
  const [inputs, setInputs] = useState({});

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(inputs);
  };

  const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    setInputs((values) => ({ ...values, [name]: value }));
  };

  return (
    <main>
      <h1>Create Flower</h1>
      <br />
      <form onSubmit={handleSubmit}>
        <label>Name</label>
        <input type="name" name="name" onChange={handleChange}></input>

        <label> Description</label>
        <input
          type="description"
          name="description"
          onChange={handleChange}
        ></input>

        <label> Maintenance</label>
        <input
          type="maintenance"
          name="maintenance"
          onChange={handleChange}
        ></input>

        <label>Location</label>
        <input type="location" name="location" onChange={handleChange}></input>

        <label>Color</label>
        <input type="color" name="color" onChange={handleChange}></input>

        <label>Winter care tips</label>
        <input
          type="winter_care_tips"
          name="winter_care_tips"
          onChange={handleChange}
        ></input>

        <label>How to use</label>
        <input
          type="how_to_use"
          name="how_to_use"
          onChange={handleChange}
        ></input>

        <label>Propagation</label>
        <input
          type="propagation"
          name="propagation"
          onChange={handleChange}
        ></input>

        <label>Worth Knowing</label>
        <input
          type="worth_knowing"
          name="worth_knowing"
          onChange={handleChange}
        ></input>

        <button type="submit">Submit</button>
      </form>
    </main>
  );
}
