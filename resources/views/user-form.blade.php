<div>
<h2>Add New User</h2>
<form action="adduser" method="post">
    @csrf
    <div class="input-wrapper">
        <input type="text" placeholder="Enter UserName" name="username">
    </div>
    <div class="input-wrapper">
        <input type="text" placeholder="Enter User Email" name="email">
    </div>
    <div class="input-wrapper">
        <input type="text" placeholder="Enter User City" name="city">
    </div>
    <div class="input-wrapper">
<button>Add new user </button>
    </div>
</form>
</div>
<style>
input{
    border: orange 1px solid;
    height: 35px;
    width: 200px;
    border-radius: 2px;
    color: orange;
}
.input-wrapper{
    margin:10px
}
button{
    border: orange 1px solid;
    height: 35px;
    width: 200px;
    border-radius: 2px;
    color: orange;
    background-color:red;
    cursor:pointer;


}
</style>