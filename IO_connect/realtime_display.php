<!DOCTYPE html>
<html>
<head>
    <title>Real-time Data</title>
    <link rel="stylesheet" href="realtime_display.css">
</head>
<body>
    <?php  
        include 'connect.php'; 
        include 'display.php';
    ?>
    <script>
        setInterval(function() {
            location.reload();
        }, 10000);
    </script>
</body>
</html>