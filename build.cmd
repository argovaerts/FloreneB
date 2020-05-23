start /b php -S localhost:8878
wget -r http://localhost:8878/Source/
robocopy localhost+8878\Source Site /move /mir
rclone sync Site blog:q4-re-blog-files
rd /s/q localhost+8878
