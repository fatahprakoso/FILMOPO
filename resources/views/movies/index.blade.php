{{"Hello World"}}
{{$movies}}

<script>
    fetch('https://www.omdbapi.com/?apikey=b206be1f&t=titan').then(response => response.json()).then(data => console.log(data));
</script>