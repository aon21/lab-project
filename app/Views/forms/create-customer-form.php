<div class="w-1/3 border border-black rounded p-6 m-4">

    <h3>Create new customer</h3>

    <form method="post" action="/" class="mb-0 mt-2 grid grid-col-1 space-y-2">

        <div class="flex flex-col">
            <label for="name">*Name:</label>
            <input type="text" id="name" name="name" class="border border-silver hover:border-black appearance-none">
        </div>

        <div class="flex flex-col">
            <label for="email">*Email:</label>
            <input type="email" id="email" name="email" class="border border-silver hover:border-black appearance-none">
        </div>

        <input type="submit" class="border border-black py-1 px-4 mt-4 cursor-pointer hover:text-white hover:bg-black" value="Submit">
    </form>
</div>
