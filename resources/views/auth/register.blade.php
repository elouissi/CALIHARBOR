@extends('layouts.nav')
@section('content')
    <form action="{{route('register')}}" method="POST" >
        @csrf
        <h3>register Here</h3>

<div class="inputs" >
        <div class="input-form" >
    <label for="username">votre nom</label>
    <input type="text"name="name" placeholder="username" id="username">
        </div>
        <div class="input-form" >

    <label for="email">email</label>
    <input type="email" name="email" placeholder="email" id="email">
        </div>
        <div class="input-form" >

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" id="password">
        </div>
        <div class="input-form" >

    <label for="password">cofirm password</label>
    <input type="password" name="confirm-password" placeholder="cofirm password" id="cofirm password">
        </div>
  
</div>  
<div style="display: flex; gap: 10px ;">   
<div class="input-form">
    <label for="password">Age</label>
    <select name="age" id="meal-preference">
        <option selected >choisir votre age</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
     
        <!-- Ajoutez d'autres options selon vos besoins -->
    </select>
</div>   
<div class="input-form">
    <label for="password">Poids</label>
    <select name="poids" id="meal-preference">
        <option name="poids" selected >choisir votre poids</option>
        <option value="55">55</option>
        <option value="60">60</option>
        <option value="65">65</option>
        <option value="70">70</option>
        <option value="75">75</option>
        <option value="80">80</option>
        <option value="85">85</option>
        <!-- Ajoutez d'autres options selon vos besoins -->
    </select>
</div>   
<div class="input-form">
    <label for="password">hauteur</label>
    <select name="hauteur" id="meal-preference">
        <option selected >choisir votre hauteur</option>
        <option value="150">150</option>
        <option value="160">160</option>
        <option value="170">170</option>
        <option value="175">175</option>
        <option value="178">178</option>
        <option value="180">180</option>
        <option value="185">185</option>
        <!-- Ajoutez d'autres options selon vos besoins -->
    </select>
</div>   
</div>
 

        <button>register</button>
    
    </form>
</body>
@endsection
</html>
