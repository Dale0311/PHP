<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formAction.php">
        
        <label>Name: 
            <input type="text" name="txtname">
        </label>

        <label>Password: 
            <input type="password" name="txtpass">
        </label>
        
        <label>email: 
            <input type="email" name="txtemail" autocomplete="true">
        </label>
        
        <label>gender: 
            <label>
                Male:
                <input type="radio" name="txtgen" value="male">
            </label>
            <label>
                Female:
                <input type="radio" name="txtgen" value="female">
            </label>
        </label>
        
        <Select name="fruit">
            <option value="apple">apple</option>
            <option value="banana">banana</option>
            <option value="cantelope">cantelope</option>
        </Select>
        
        <textarea name="comment"></textarea>

        <button type="submit">Send</button>
    </form>
</body>
</html>