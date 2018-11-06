# mediastreamer
Simple tool to allow media streaming via RTMP. [nginx-rtmp-module](https://github.com/arut/nginx-rtmp-module) is used as the server, a simple PHP script manages access control for streaming.

## Usage
### Setup
Clone the repository and start the server with the following command:
```
docker-compose up -d
```

### Configuration
Streams and the keys can be configured in the `config.php` file. The keys are transmitted unencrypted!  
You can use the following command to generate a key: `tr -cd '[:alnum:]' < /dev/random | fold -w48 | head -n1`

### Streaming to the server
- ***OBS***  
URL: `rtmp://<ipaddress>:1935/live/`  
Stream key: `watchtogether?key=supersecretkey`
- ***ffmpeg***  
Command: `ffmpeg -re -i file.mkv -c:v libx264 -preset veryfast -maxrate 6000k -bufsize 12000k -pix_fmt yuv420p -g 50 -c:a aac -b:a 160k -ac 2 -ar 44100 -f flv "rtmp://<ipaddress>:1935/live/watchtogether?key=supersecretkey"`

### Viewing the stream
Use VLC or any other player capable of RTMP with the following URL: `rtmp://<ipaddress>:1935/live/watchtogether`

## License
```
MIT License

Copyright (c) 2018 Rene Hollander

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

