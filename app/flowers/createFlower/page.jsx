export default function createFlower() {
  return (
    <main>
      <h1>Create Flower</h1>
      <br />
      <form>
        <label>Name</label>
        <input type="name" name="name"></input>

        <label> Description</label>
        <input type="description" name="description"></input>

        <label> Maintenance</label>
        <input type="maintenance" name="maintenance"></input>

        <label>Location</label>
        <input type="location" name="location"></input>

        <label>Color</label>
        <input type="color" name="color"></input>

        <label>Winter care tips</label>
        <input type="winter_care_tips" name="winter_care_tips"></input>

        <label>How to use</label>
        <input type="how_to_use" name="how_to_use"></input>

        <label>Propagation</label>
        <input type="propagation" name="propagation"></input>

        <label>Worth Knowing</label>
        <input type="worth_knowing" name="worth_knowing"></input>

        <button type="submit">Submit</button>
      </form>
    </main>
  );
}
