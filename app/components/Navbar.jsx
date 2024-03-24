import Link from "next/link";

export default function Navbar() {
  return (
    <main >
      <h1>Flower CRUD Management System</h1>
      <nav>
        <Link href="/users">Users</Link>
        <Link href="/flowers">Flowers</Link>
       
      </nav>
    </main>
  );
}
