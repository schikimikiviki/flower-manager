import Link from "next/link";
import bg from "./bg.jpg";

export default function Navbar() {
  return (
    <main>
      <div className="header-bg">
        <h1>Flower CRUD Management System</h1>
        <nav>
          <Link href="/users">Users</Link>
          <Link href="/flowers">Flowers</Link>
        </nav>
        <hr className="hr-styled"></hr>
      </div>
    </main>
  );
}
