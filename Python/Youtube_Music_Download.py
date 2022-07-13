# python -m pip install pytube

import os
from pytube import YouTube
from pytube import Playlist


# Set Files Where you save

target_folderName = 'JustDanceSongs'

if not os.path.exists(target_folderName):
    os.mkdir(target_folderName)

target_path = os.getcwd() + "/JustDanceSongs"
os.chdir(target_path)


# DownLoad Single Music

downloaded_file = YouTube('https://youtu.be/2lAe1cqCOXo').streams.get_audio_only().download()

base, ext = os.path.splitext(downloaded_file)
new_file = base + '.mp3'
os.rename(downloaded_file, new_file)


# Download PlayList 

download_playlist = Playlist('https://www.youtube.com/playlist?list=PLS1QulWo1RIaJECMeUT4LFwJ-ghgoSH6n')


for video in download_playlist.videos:
    print(video.title)
    downloaded_file = video.streams.get_audio_only().download()

    base, ext = os.path.splitext(downloaded_file)
    new_file = base + '.mp3'
    os.rename(downloaded_file, new_file)

    print('Completed!')
