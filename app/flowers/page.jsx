import Link from "next/link";


export default function Users() {
  return (
    <main >
      <h1>Flower actions</h1>
      <nav>
        <Link href="/flowers/createFlower">Create flower</Link>
        <Link href="/flowers/listFlower">List flower</Link>
        <Link href="/flowers/editFlower">Update flower</Link>
        <Link href="/flowers/deleteFlower">Delete flower</Link>
      </nav>
    </main>
  );
}
