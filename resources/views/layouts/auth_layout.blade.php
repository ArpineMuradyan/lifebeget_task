<div class="flex bg-gray-100 border-b border-gray-300 py-4">
    @guest
        <div class="container mx-auto flex justify-between">
            <div class="flex">
                <a class="mr-4" href="/login" exact>Login</a>
                <a href="/registration">Registration</a>
            </div>
        </div>
    @endguest
    @auth
        <div class="container mx-auto flex justify-between">
            <div class="flex">
            </div>
            <div class="flex">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    @endauth

</div>
