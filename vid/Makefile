all: pres2014.mp4 pres2014.jpg

pres2014.mp4: orig/CREP\ mai\ 2014.mp4
	ffmpeg -i "$<" -strict -2 $@ -y

pres2014.webm: orig/CREP\ mai\ 2014.mp4
	ffmpeg -i "$<" $@ -y

pres2014.ogg: orig/CREP\ mai\ 2014.mp4
	ffmpeg -i "$<" $@ -y

pres2014.jpg: pres2014.mp4
	ffmpeg -ss 00:01:49 -i $< -frames:v 1 $@ -y
	convert -strip -interlace Plane -gaussian-blur 0.05 -quality 90% $@ $@

clear:
	rm pres2014.*
