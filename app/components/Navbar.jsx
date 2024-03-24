import Link from "next/link";
import logo from "./flower-logo.jpg";
import Image from "next/image";

export default function Navbar() {
  return (
    <main>
      <h1>Flower CRUD Management System</h1>
      <nav>
        <Image
          src={logo}
          alt="flower logo"
          width={300}
          quality={100}
          placeholder="blur"
        />
        <Link href="/users">Users</Link>
        <Link href="/flowers">Flowers</Link>
      </nav>
      <hr className="hr-styled"></hr>
    </main>
  );
}
