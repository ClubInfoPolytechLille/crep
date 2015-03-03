GENIMG=lille1.png polytechlille.png
CMPIMG=CREP-1.jpg CREP-2.jpg CREP-3.jpg CREP-4.jpg CREP-5.jpg

ALLGEN=$(GENIMG) $(CMPIMG) mainBgPattern.png polyMap.png

all: $(ALLGEN)

mainBgPattern.png:
	wget http://subtlepatterns.com/patterns/low_contrast_linen.png -O $@
	convert -negate $@ $@
	convert -channel B -evaluate multiply 1.2 $@ $@
	optipng -o7 $@

polyMap.png:
	wget "https://maps.googleapis.com/maps/api/staticmap?center=50.6074998,3.1373338&zoom=16&size=640x200&scale=2&maptype=roadmap&markers=color:red%7Clabel:P%7C50.6074998,3.1373338" -O $@
	optipng -o7 $@

%.png: %.svg
	convert -background none $< $@
	optipng -o7 $@

%.jpg: orig/%.jpg
	convert -resize x1200 -strip -interlace Plane -gaussian-blur 0.05 -quality 90% $< $@

clean:
	rm -rf $(ALLGEN)
