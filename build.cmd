start /b php -S localhost:8878
wget -r http://localhost:8878/Source/
robocopy localhost+8878\Source Site /move /mir
robocopy Source\assets Site\assets
robocopy Source\assets\icons Site\assets\icons
rclone sync Site blog:q4-re-blog-files
rd /s/q localhost+8878
