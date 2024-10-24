<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="tree">
        <!--
We will create a family tree using just CSS(3)
The markup will be simple nested lists
-->
        <div class="tree">
            <ul>
                <li>
                    <a href="#">Parent</a>
                    <a href="#">Grand Child</a>
                    <ul>
                        <li>
                            <a href="#">Child</a>
                            <ul>
                                <li>
                                    <a href="#">Grand Child</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Child</a>
                            <ul>
                                <li><a href="#">Grand Child</a></li>
                                <li>
                                    <a href="#">Grand Child</a>
                                    <a href="#">Grand Child</a>
                                    <ul>
                                        <li>
                                            <a id=1 href="#">Great Grand Child</a>
                                        </li>
                                        <li>
                                            <a href="#">Great Grand Child</a>
                                        </li>
                                        <li>
                                            <a href="#">Great Grand Child</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Grand Child</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <br>
        <div>
            <form>
                <input name="name" id="name" type="text">
                <button>add animal</button>
            </form>
        </div>

</body>

<!-- scripts -->
<script defer src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script defer src="recessiva_try.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</html>