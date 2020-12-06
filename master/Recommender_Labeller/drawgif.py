from __future__ import print_function
import sys
sys.path.append(".")
import matplotlib.pyplot as plt
plt.rcParams['animation.ffmpeg_path']='V:/ffmpeg/bin/ffmpeg.exe'
import matplotlib.animation as animation
import matplotlib as mlp
import matplotlib.image as mpimg
import pandas as pd
import numpy as np
from PIL import Image
from mongoapi import mongo


class SequenceAnimator():


    def plot_court(self, axis, courtimg):
        plt.imshow(courtimg, extent=axis, zorder=0)


    def animate(self, n):  # matplotlib's animation function loops through a function n times that draws a different frame on each iteration
        for i, j in enumerate(self.player_coor[n]):  # iterate through every player
            self.player_circ[i].center = (j[1], j[2])  # change each players xy position
            self.player_text[i].set_text(str(self.jerseydict[str(int(j[0]))]))  # set jersey num for each player.
            self.player_text[i].set_x(j[1])  # set the text x position
            self.player_text[i].set_y(j[2])  # set text y position
        self.ball_fig.center = (self.ball_coor[n, 0], self.ball_coor[n, 1])  # change ball xy position
        self.ball_fig.radius = 1.1
        return tuple(self.player_text) + tuple(self.player_circ) + (self.ball_fig,)


    def init(self):  # default plot from matplotlib animation before drawing frames.
        for i in range(10):  # set up players
            self.player_text[i].set_text('')
            self.axis.add_patch(self.player_circ[i])
        self.axis.add_patch(self.ball_fig)  # create ball
        self.axis.axis('off')  # turn off axis
        dx = 5
        plt.xlim([0, 94])  # set axis
        plt.ylim([0, 50])
        return tuple(self.player_text) + tuple(self.player_circ) + (self.ball_fig,)


    def plotgif(self, seq_id, pathmod='\seq'):
        # fetch seq data in db
        try:
            mymongo=mongo()
            mymongo.connect()
            data = mymongo.findseq_byid(seq_id, 0)



            # get home/away team


            hometeam = data['events']['home']['name']
            awayteam = data['events']['visitor']['name']

            # get home/away player id+ jersey number
            away_pid_jerseynum = np.array(
                [[player['playerid'], player['jersey']] for player in data['events']['visitor']['players']])
            home_pid_jerseynum = np.array(
                [[player['playerid'], player['jersey']] for player in data['events']['home']['players']])

            # zip into jerseydict
            self.jerseydict = {**{pid: jnum for pid, jnum in away_pid_jerseynum}, **{pid: jnum for pid, jnum in home_pid_jerseynum}}
            # get ball/player coordinates
            self.ball_coor = np.array([mom[5][0][2:5] for mom in data['events']['moments']])  # np array of ball coords
            self.player_coor = np.array(
                [np.array(mom[5][1:])[:, 1:4] for mom in data['events']['moments']])  # np array of player coords

            fig = plt.figure(figsize=(15, 7.5))  # create figure object
            self.axis = plt.gca()  # create axis object

            self.plot_court([0, 94, 0, 50], mpimg.imread('V:/Dejaplay/master/Recommender_Labeller/NBAcourts/' + hometeam + '.jpg'))  # plot the basketball court
            self.ball_fig = plt.Circle((0, 0), 1.1, color=[1, 0.4, 0])  # create fig for bal
            self.player_text = list(range(10))  # create player text vector
            self.player_circ = list(range(10))  # create player circle vector

            for playerindex in range(0, 10):  # create circle object and text object for each player
                if playerindex < 5:
                    col = ['w', 'k']  # color for home players
                else:
                    col = ['k', 'w']  # color for away players
                self.player_circ[playerindex] = plt.Circle((0, 0), 2.2, facecolor=col[0], edgecolor='k')  # player circle
                self.player_text[playerindex] = self.axis.text(0, 0, '', color=col[1], ha='center', va='center')  # player jersey # (text)

            ani = animation.FuncAnimation(fig, self.animate,
                                          frames=np.size(self.ball_coor, 0), init_func=self.init, blit=True, interval=5, repeat=False,
                                          save_count=0)  # function for making video

            #mywriter = animation.FFMpegWriter(fps=60)
            #ani.save('seqgif/Event_2.mp4', writer=mywriter)
            #ani.save('seqgif/Event_%d.mp4' % (seq_id),dpi=100,fps=25)
            print('plotting... sequence ', seq_id)
            ani.save('V:\Xmapp\Xampp\htdocs\DejaPlay\images'+pathmod+'\Event_%d.gif' % (seq_id), writer='pillow', dpi=100, fps=25)  # function for saving video
            #print(ani.to_html5_video())
            # plt.close('all')  # close the plot
            print('plotted')

            return '0'

        except Exception as e:
            print('Exception', e)
            return '-1'
