<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>My Notes</title>
    <link rel="stylesheet" href="css/notes.css">
</head>
<body>
    <h2>Notes</h2>
    <section id="nodoc">
        <p>As storing notes within a database would be...rather complicated, we will instead use a Google Doc, and link it to this page.</p>
        <p>You'll need to go to your <a href="https://drive.google.com/drive/u/0/my-drive" target="_blank">Google Drive</a> and create a new document.</p>
        <p>I would suggest naming this document something like "RP Notes" or something like that. You can rename by clicking on the name above the file & edit toolbar.</p>
        <p>Once it is named whatever you want, You will need to share it. Make sure you enable edit permissions with the link. This isn't all that hard to do.</p>
        <p>Next,  copy the link into the box below, and "submit" it to watch magic happen.</p>
        <form id="notesdoc">
            <label for="gdoc">Link to Google Doc: </label>
            <input type="text" id="gdoc" name="g_doc">
            <input type="submit" value="Add the document">
            <input type="hidden" id="g_doc" value="">
        </form>
    </section>
    <!-- 
When the PHP is added, this will be a  variable pulled from the database. If it is null, the iframe is hidden and the section is shown. 
If there is something there, then  the iframe will show, and the section will hide.-->
    <iframe src=""></iframe>
</body>