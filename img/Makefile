GENIMG=lille1.png polytechlille.png
CMPIMG=CREP-1.jpg CREP-2.jpg CREP-3.jpg CREP-4.jpg CREP-5.jpg

all: $(GENIMG) $(CMPIMG) mainBgPattern.png

mainBgPattern.png:
	wget http://subtlepatterns.com/patterns/low_contrast_linen.png -O $@
	convert -negate $@ $@
	convert -channel B -evaluate multiply 1.2 $@ $@
	optipng -o7 $@

%.png: %.svg
	convert -background none $< $@
	optipng -o7 $@

%.jpg: orig/%.jpg
	convert -resize x1200 -strip -interlace Plane -gaussian-blur 0.05 -quality 90% $< $@

clean:
	rm -rf $(GENIMG) $(CMPIMG)
