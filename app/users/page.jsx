import Link from "next/link";


export default function Users() {
  return (
    <main >
      <h1>User actions</h1>
      <nav>
        <Link href="/users/createUser">Create user</Link>
        <Link href="/users/listUser">List users</Link>
        <Link href="/users/editUser">Update user</Link>
        <Link href="/users/deleteUser">Delete user</Link>
      </nav>
    </main>
  );
}
