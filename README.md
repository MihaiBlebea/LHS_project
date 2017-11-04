# Love Home Swap project

<h3>Download</h3>
Just clone this repo anywhere on your local computer. <br>
You can also use the command line and navigate to the sepcific folder, then type<br> "<strong>git clone https://github.com/SerbanBlebea/LHS_project.git</strong>".

<h3>Install</h3>
Use the command line and navigate to the new folder that contains this repo, then type "<strong>composer install</strong>".
This repo contains just the PHPUnit testingpackage, but composer will also help us with the autoload.

<h3>Use</h3>
After the install step is finished, stay in the same folder and type "<strong>php payment <year> <language> <file-to-save></strong>".
If no errors are flagged by the validator, you should get a message confirming that the output was written to your specified file in the <strong>"log" folder</strong>

<h4>The complete list of params</h4>
<ul>
<ol>1. <strong>PHP PAYMENT</strong> - Specify the name of the payment application. Must be typed with every call.</ol><br>
<ol>2. <strong>YEAR</strong> - Specify the year for witch you want to calculate the payment days. Can be anything from 1555 to 2200 and beyond...</ol><br>
<ol>3. <strong>LANGUAGE OF OUTPUT</strong> - Specify the language for the output.<br> Curently the program supports <strong>en</strong> (english-default), <strong>es</strong> (spanish) and <strong>ro</strong> (romanian) </ol><br>
<ol>4. <strong>NAME OF OUTPUT FILE</strong> -Type the name of the output file. <br> Don't specify the path of the extension, but instead, just type the desired name. <br> For example: "file_01" or "big_business_ltd". Don't leave open spaces in the name of the file. This param is also optional, so if nothing is specified, the default "<strong>doc.txt</strong>" will be selected as destination.</ol>
</ul><br>

This is a simple command ex: <strong>php payment 2008 en doc_01</strong> or <strong>php payment es doc_008</strong>

<h3>Test</h3>

You can find all the tests in the <strong>test/Unit</strong> folder.<br>
To run the PHPUnit tests, just go to the root folder of the app and type <strong>vendor\bin\phpunit</strong> in the command line.
